import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { environment } from 'src/environments/environment';
import { Observable } from 'rxjs';
import { Pacote } from '../interfaces/pacote';


@Injectable({
  providedIn: 'root'
})
export class PacoteService {

  constructor(private http: HttpClient) {}

/*   getListaPacotes() {
    return this.http.get(environment.apiPacotes + 'pacotes');
  } */

  getListaPacotes(): Observable<Pacote[]> {
    const url = environment.apiPacotes + 'pacotes';
    return this.http.get<Pacote[]>(url);
  }

  getPacote(id: number): Observable<Pacote> {
    const url = '${environment.apiPacotes}/pacote/${id}';
    return this.http.get<Pacote>(url);
  }

  // tslint:disable-next-line: one-line
  addPacote(id: number){
    return this.http.post(environment.apiUsuario + 'comprar', id);
  }
}
