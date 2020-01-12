import { NgModule, Component } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { ListaPacotesComponent } from './compartilhado/lista-pacotes/lista-pacotes.component';
import { CardDetalhesComponent } from './card-detalhes/card-detalhes.component';
import { PaginaInicialComponent } from './pagina-inicial/pagina-inicial.component';
import { LoginComponent } from './login/login.component';
import { CadastroComponent } from './cadastro/cadastro.component';
import { MeusPacotesComponent } from './meus-pacotes/meus-pacotes.component';


const routes: Routes = [
  {path: '', component: PaginaInicialComponent},
  {path: 'cadastrar', component: CadastroComponent},
  {path: 'login', component: LoginComponent},
  {path: 'pacotes', component: ListaPacotesComponent},
  {path: 'meuspacotes', component: MeusPacotesComponent},
  {path: 'detalhes/:id', component: CardDetalhesComponent }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
