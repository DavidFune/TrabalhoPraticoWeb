import { Component, OnInit, EventEmitter, ViewChild} from '@angular/core';
import { PacoteService } from '../services/pacote.service';
import { Router } from '@angular/router';
import { ErroMgsComponent } from '../compartilhado/erro-mgs/erro-mgs.component';
import { Login } from '../interfaces/login';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent {
  login: Login = {} as Login;
  @ViewChild (ErroMgsComponent, {static: false}) erroMgsComponent: ErroMgsComponent;
  constructor(private pacoteService: PacoteService, private router: Router) { }


  onSubmit(event: Login) {
    this.pacoteService.loginUser(event)
    .subscribe(
      () => { this.router.navigateByUrl('/'); },
      () => {this.erroMgsComponent.setErro('Falha ao Logar'); }
    );
  }

}
