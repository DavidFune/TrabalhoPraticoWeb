import { Component, ViewChild, OnInit } from '@angular/core';
import { ErroMgsComponent } from './compartilhado/erro-mgs/erro-mgs.component';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
// tslint:disable-next-line: one-line
export class AppComponent implements OnInit{
  title = 'Funy Turismo';
  // tslint:disable-next-line: comment-format
  ngOnInit() {
  }
}
