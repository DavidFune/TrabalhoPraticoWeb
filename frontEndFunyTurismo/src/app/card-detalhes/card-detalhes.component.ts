import { Component, OnInit, ViewChild } from '@angular/core';
import { PacoteService } from '../services/pacote.service';
import { ErroMgsComponent } from '../compartilhado/erro-mgs/erro-mgs.component';
import { ActivatedRoute, Router } from '@angular/router';
import { Pacote } from '../interfaces/pacote';



@Component({
  selector: 'app-card-detalhes',
  templateUrl: './card-detalhes.component.html',
  styleUrls: ['./card-detalhes.component.css']
})
export class CardDetalhesComponent {

  public pacote: Pacote = {} as Pacote;
  public msg;
  // tslint:disable-next-line: variable-name
  public id_pacote: number;
  @ViewChild (ErroMgsComponent, {static: false}) erroMgsComponent: ErroMgsComponent;
  constructor(private pacoteService: PacoteService,
              private activateRoutAe: ActivatedRoute,
              private router: Router
              ) {
                this.getPacote(this.activateRoutAe.snapshot.params.id);
              }

  getPacote(id: number) {
    this.pacoteService.getPacote(id)
    .subscribe((pacote: Pacote) => {
      this.pacote = pacote;
    }, () => {this.erroMgsComponent.setErro('Falha ao buscar Pacote'); });
  }

/*   getPacoteAux(id: number) {
    this.pacoteService.getPacoteAux(id)
    .subscribe(dados => {this.pacoteAux = dados;
    }, () => {this.erroMgsComponent.setErro('Falha ao buscar Pacote'); });
  } */

  addPacote() {
    this.pacoteService.addPacote(this.pacote.id)
    .subscribe(dado => this.msg = dado
      , () => {this.erroMgsComponent.setErro('Faça Login ou se cadastre'); this.router.navigateByUrl('/login'); });
  }

  existePacote(): boolean {
    return this.pacote.id == null;
  }
}
