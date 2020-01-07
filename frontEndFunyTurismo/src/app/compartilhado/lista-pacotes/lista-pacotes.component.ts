import { Component, OnInit, ViewChild } from '@angular/core';
import { ErroMgsComponent } from '../erro-mgs/erro-mgs.component';
import { PacoteService } from 'src/app/services/pacote.service';
import { Pacote } from 'src/app/interfaces/pacote';

@Component({
  selector: 'app-lista-pacotes',
  templateUrl: './lista-pacotes.component.html',
  styleUrls: ['./lista-pacotes.component.css']
})
export class ListaPacotesComponent implements OnInit {

  public pacotes: Pacote[];
  public inscricao;
  @ViewChild (ErroMgsComponent, {static: false}) erroMgsComponent: ErroMgsComponent;
  constructor(private pacoteService: PacoteService) { }

  ngOnInit() {
/*     this.inscricao = this.pacoteService.getListaPacotes()
    .subscribe(dados => this.pacotes = dados);
    console.log(this.pacotes); */
    this.getListaPacote();
  }
  getListaPacote() {
    this.pacoteService.getListaPacotes()
    .subscribe((pacotes: Pacote[]) => {
      this.pacotes = pacotes;
    }, () => {this.erroMgsComponent.setErro('Falha ao buscar Pacotes'); });
  }

  existePacotes(): boolean {
    return this.pacotes && this.pacotes.length > 0;
  }
}
