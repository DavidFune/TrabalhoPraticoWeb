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

  onSubmit() {
    console.log(this.login.email);
    this.pacoteService.loginUser(this.login)
    .subscribe(
      () => { this.router.navigateByUrl('/'); },
      () => {this.erroMgsComponent.setErro('Falha ao Logar'); }
    );
  }

}
