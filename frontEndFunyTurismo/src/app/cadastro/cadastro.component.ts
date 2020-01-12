import { Component, ViewChild } from '@angular/core';
import { ErroMgsComponent } from '../compartilhado/erro-mgs/erro-mgs.component';
import { Router } from '@angular/router';
import { Cadastro } from '../interfaces/cadastro';
import { PacoteService } from '../services/pacote.service';

@Component({
  selector: 'app-cadastro',
  templateUrl: './cadastro.component.html',
  styleUrls: ['./cadastro.component.css']
})
export class CadastroComponent {
  @ViewChild (ErroMgsComponent, {static: false}) erroMgsComponent: ErroMgsComponent;
  constructor(
    private pacoteService: PacoteService,
    private router: Router
  ) { }

  addUser(cadastro: Cadastro) {
    this.pacoteService.addUser(cadastro)
    .subscribe(
      () => {this.router.navigateByUrl('/pacotes'); },  erro => {
        if (erro.status === 400) {
          this.erroMgsComponent.setErro('Preencha os campus corretamente');
          console.log(erro);
        }
      },
      () => {this.erroMgsComponent.setErro('Erro ao se cadastrar'); }
    );
  }

}
