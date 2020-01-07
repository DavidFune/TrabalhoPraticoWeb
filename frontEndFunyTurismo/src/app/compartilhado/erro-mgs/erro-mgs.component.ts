import { Component } from '@angular/core';

@Component({
  selector: 'app-erro-mgs',
  templateUrl: './erro-mgs.component.html',
  styleUrls: ['./erro-mgs.component.css']
})
export class ErroMgsComponent {

  public erro: string;

  // tslint:disable-next-line: one-line
  setErro(erro: string, tempo: number = 5000){
    this.erro = erro;
    setTimeout(() => {
      this.erro = null;
    }, tempo);
  }
}
