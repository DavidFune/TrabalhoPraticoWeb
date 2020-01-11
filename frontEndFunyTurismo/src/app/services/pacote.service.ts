import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { environment } from 'src/environments/environment';
import { Observable } from 'rxjs';
import { Pacote } from '../interfaces/pacote';
import { Cadastro } from '../interfaces/cadastro';
import { Login } from '../interfaces/login';


@Injectable({
  providedIn: 'root'
})
export class PacoteService {

  constructor(private http: HttpClient) {}

/*   getListaPacotes() {
    return this.http.get(environment.apiPacotes + 'pacotes');
  } */

  getListaPacotes(): Observable<Pacote[]> {
    const url = `${environment.apiPacotes}pacotes`;
    return this.http.get<Pacote[]>(url);
  }

  getPacote(id: number): Observable<Pacote> {
    const url = `${environment.apiPacotes}pacote/${id}`;
    console.log('Test' + this.http.get<Pacote>(url));
    return this.http.get<Pacote>(url).pipe();
  }

 /*  getPacoteAux(id: number) {
    const url = `${environment.apiPacotes}pacote/${id}/detalhes`;
    return this.http.get(url);
  } */

  // tslint:disable-next-line: one-line
  addPacote(id: number){
    const url = `${environment.apiUsuario}comprar`;
    return this.http.post(url, id);
  }

  addUser(cadastro: Cadastro): Observable<Cadastro> {
    const url = `${environment.apiUsuario}registrar`;
    return this.http.post<Cadastro>(url, cadastro);
  }
   loginUser(login: Login): Observable<Login> {
    const url = `${environment.apiUsuario}login`;
    console.log(this.http.post(url, login));
    return this.http.post<Login>(url, login);
  }

  editUser(editar: Cadastro): Observable<Cadastro> {
    const url = `${environment.apiUsuario}editar`;
    return this.http.put<Cadastro>(url, editar);
  }
}
