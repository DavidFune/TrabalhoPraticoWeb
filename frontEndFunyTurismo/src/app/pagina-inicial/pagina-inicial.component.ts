import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-pagina-inicial',
  templateUrl: './pagina-inicial.component.html',
  styleUrls: ['./pagina-inicial.component.css']
})
export class PaginaInicialComponent implements OnInit {
  public images = [
    '../../assets/images/img01.jpg',
    '../../assets/images/img02.jpg',
    '../../assets/images/img03.jpg',
  ];

  constructor() { }

  ngOnInit() {
  }

}
