import { NgModule, Component } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { ListaPacotesComponent } from './compartilhado/lista-pacotes/lista-pacotes.component';
import { CardDetalhesComponent } from './card-detalhes/card-detalhes.component';


const routes: Routes = [
  {path: 'pacotes', component: ListaPacotesComponent},
  {path: 'pacotes/detalhes/:id', component: CardDetalhesComponent }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
