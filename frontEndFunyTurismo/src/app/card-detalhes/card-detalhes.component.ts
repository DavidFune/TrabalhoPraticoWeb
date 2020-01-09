import { Component, OnInit, ViewChild } from '@angular/core';
import { PacoteService } from '../services/pacote.service';
import { ErroMgsComponent } from '../compartilhado/erro-mgs/erro-mgs.component';
import { ActivatedRoute } from '@angular/router';
import { Pacote } from '../interfaces/pacote';



@Component({
  selector: 'app-card-detalhes',
  templateUrl: './card-detalhes.component.html',
  styleUrls: ['./card-detalhes.component.css']
})
export class CardDetalhesComponent {

  public pacote: Pacote = <Pacote>{};
  public pacoteAux;
  @ViewChild (ErroMgsComponent, {static: false}) erroMgsComponent: ErroMgsComponent;
  constructor(private pacoteService: PacoteService,
              private activateRoutAe: ActivatedRoute) {
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


  existePacote(): boolean {
    return this.pacote.id == null;
  }
}
