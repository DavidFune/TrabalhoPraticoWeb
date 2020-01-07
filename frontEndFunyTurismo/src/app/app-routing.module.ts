import { NgModule, Component } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { ListaPacotesComponent } from './compartilhado/lista-pacotes/lista-pacotes.component';


const routes: Routes = [
  {path: '', component: ListaPacotesComponent}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
