import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { environment } from 'src/environments/environment';
import { Observable } from 'rxjs';
import { Pacote } from '../interfaces/pacote';
import { Cadastro } from '../interfaces/cadastro';
import { Login } from '../interfaces/login';
import { Token } from '../interfaces/token';


@Injectable({
  providedIn: 'root'
})
export class PacoteService {
  private token: Token = {} as Token;
  constructor(private http: HttpClient) {
  }

/*   getListaPacotes() {
    return this.http.get(environment.apiPacotes + 'pacotes');
  } */

  public setToken(token: Token) {
    this.token = token;
  }
  public getToken() {
    return this.token.token;
  }

  getListaPacotes(): Observable<Pacote[]> {
    const url = `${environment.apiPacotes}pacotes`;
    return this.http.get<Pacote[]>(url);
  }
  getMeusPacotes(): Observable<Pacote[]> {
    const url = environment.apiUsuario + 'meuspacotes' +
    '?token=' + this.token.token;
    return this.http.get<Pacote[]>(url);
  }

  getPacote(id: number): Observable<Pacote> {
    const url = `${environment.apiPacotes}pacote/${id}`;
    return this.http.get<Pacote>(url).pipe();
  }

 /*  getPacoteAux(id: number) {
    const url = `${environment.apiPacotes}pacote/${id}/detalhes`;
    return this.http.get(url);
  } */

  // tslint:disable-next-line: one-line
  addPacote(id: number){
    const url = environment.apiUsuario + 'comprar' +
    '?id_pacote=' + id + '&token=' + this.token.token;
    return this.http.post(url, {});
  }

  addUser(cadastro: Cadastro): Observable<Cadastro> {
    const url = `${environment.apiUsuario}registrar`;
    return this.http.post<Cadastro>(url, cadastro);
  }
   loginUser(login: Login): Observable<Login> {
    const url = `${environment.apiUsuario}login`;
    return this.http.post<Login>(url, login);
  }

  editUser(editar: Cadastro): Observable<Cadastro> {
    const url = `${environment.apiUsuario}editar`;
    return this.http.put<Cadastro>(url, editar);
  }

}
