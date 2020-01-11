import { Component, ViewChild} from '@angular/core';
import { PacoteService } from '../services/pacote.service';
import { Router } from '@angular/router';
import { ErroMgsComponent } from '../compartilhado/erro-mgs/erro-mgs.component';
import { Login } from '../interfaces/login';
import { Token } from '../interfaces/token';


@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent {
  login: Login = {} as Login;
  token: Token = {} as Token;
  @ViewChild (ErroMgsComponent, {static: false}) erroMgsComponent: ErroMgsComponent;
  constructor(private pacoteService: PacoteService, private router: Router) {
   }

  onSubmit() {
    // console.log(event);
    this.pacoteService.loginUser(this.login)
    .subscribe(
      (token: any) =>  {this.token = token; },
      () => {this.erroMgsComponent.setErro('Falha ao Logar'); }
    );
    console.log(this.token);
  }
}
