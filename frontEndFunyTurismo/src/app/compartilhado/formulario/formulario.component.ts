import { Component, Input, Output, EventEmitter } from '@angular/core';
import { Cadastro } from 'src/app/interfaces/cadastro';


@Component({
  selector: 'app-formulario',
  templateUrl: './formulario.component.html',
  styleUrls: ['./formulario.component.css']
})
export class FormularioComponent {
  // instancia vaia do objeto cadastro
  @Input() cadastro: Cadastro = {} as Cadastro;
  @Output() outputCadastro: EventEmitter<Cadastro> = new EventEmitter();

  onSubmit() {
    this.outputCadastro.emit(this.cadastro);
  }

}
