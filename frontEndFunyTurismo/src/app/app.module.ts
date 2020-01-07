import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { HttpClientModule } from '@angular/common/http';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { CardPacoteComponent } from './compartilhado/card-pacote/card-pacote.component';
import { NavBarComponent } from './compartilhado/nav-bar/nav-bar.component';
import { CardDetalhesComponent } from './card-detalhes/card-detalhes.component';
import { MenuLateralComponent } from './compartilhado/menu-lateral/menu-lateral.component';
import { ListaPacotesComponent } from './compartilhado/lista-pacotes/lista-pacotes.component';
import { ErroMgsComponent } from './compartilhado/erro-mgs/erro-mgs.component';
import { PacoteService } from './services/pacote.service';

@NgModule({
  declarations: [
    AppComponent,
    CardPacoteComponent,
    NavBarComponent,
    CardDetalhesComponent,
    MenuLateralComponent,
    ListaPacotesComponent,
    ErroMgsComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule
  ],
  providers: [PacoteService],
  bootstrap: [AppComponent]
})
export class AppModule { }
