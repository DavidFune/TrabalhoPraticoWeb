import { Component, OnInit, Input, ViewChild, ViewChildren } from '@angular/core';
import {Pacote} from '../../interfaces/pacote';
import { PacoteService } from 'src/app/services/pacote.service';
import { ErroMgsComponent } from '../erro-mgs/erro-mgs.component';


@Component({
  selector: 'app-card-pacote',
  templateUrl: './card-pacote.component.html',
  styleUrls: ['./card-pacote.component.css']
})
export class CardPacoteComponent {

  @Input() titulo;
  @Input() descricao;
  @Input() urlImagem;
  @Input() width;
  @Input() btnTipo;

}
