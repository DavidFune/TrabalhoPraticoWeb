import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { HttpClientModule } from '@angular/common/http';
import { CarouselModule } from 'ngx-owl-carousel-o';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';


import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { CardPacoteComponent } from './compartilhado/card-pacote/card-pacote.component';
import { NavBarComponent } from './compartilhado/nav-bar/nav-bar.component';
import { CardDetalhesComponent } from './card-detalhes/card-detalhes.component';
import { MenuLateralComponent } from './compartilhado/menu-lateral/menu-lateral.component';
import { ListaPacotesComponent } from './compartilhado/lista-pacotes/lista-pacotes.component';
import { ErroMgsComponent } from './compartilhado/erro-mgs/erro-mgs.component';
import { PaginaInicialComponent } from './pagina-inicial/pagina-inicial.component';
import { LoginComponent } from './login/login.component';
import { FormularioComponent } from './compartilhado/formulario/formulario.component';

@NgModule({
  declarations: [
    AppComponent,
    CardPacoteComponent,
    NavBarComponent,
    CardDetalhesComponent,
    MenuLateralComponent,
    ListaPacotesComponent,
    ErroMgsComponent,
    PaginaInicialComponent,
    LoginComponent,
    FormularioComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    CarouselModule,
    BrowserAnimationsModule,
    HttpClientModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
