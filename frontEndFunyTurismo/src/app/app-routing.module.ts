import { NgModule, Component } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { ListaPacotesComponent } from './compartilhado/lista-pacotes/lista-pacotes.component';
import { CardDetalhesComponent } from './card-detalhes/card-detalhes.component';
import { PaginaInicialComponent } from './pagina-inicial/pagina-inicial.component';


const routes: Routes = [
  {path: 'home', component: PaginaInicialComponent},
  {path: 'pacotes', component: ListaPacotesComponent},
  {path: 'detalhes/:id', component: CardDetalhesComponent }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
