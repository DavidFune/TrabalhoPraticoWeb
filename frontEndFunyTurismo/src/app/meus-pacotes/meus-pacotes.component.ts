import { Component, OnInit, ViewChild } from '@angular/core';
import { Pacote } from '../interfaces/pacote';
import { PacoteService } from '../services/pacote.service';
import { ErroMgsComponent } from '../compartilhado/erro-mgs/erro-mgs.component';
import { Router } from '@angular/router';

@Component({
  selector: 'app-meus-pacotes',
  templateUrl: './meus-pacotes.component.html',
  styleUrls: ['./meus-pacotes.component.css']
})
export class MeusPacotesComponent implements OnInit {

  public pacotes: Pacote[];
  @ViewChild (ErroMgsComponent, {static: false}) erroMgsComponent: ErroMgsComponent;
  constructor(
    private pacoteService: PacoteService,
    private rouer: Router
    ) {}

  ngOnInit() {
    this.getMeusPacotes();
  }

  getMeusPacotes() {
    this.pacoteService.getMeusPacotes()
    .subscribe((pacotes: Pacote[]) => {
      this.pacotes = pacotes;
    }, (erro) => { if (erro.status === 401) {
      this.rouer.navigateByUrl('/login');
    } else {
      this.erroMgsComponent.setErro('Falha ao buscar Pacotes');
    }});
  }
  existePacotes(): boolean {
    return this.pacotes && this.pacotes.length > 0;
  }
}
