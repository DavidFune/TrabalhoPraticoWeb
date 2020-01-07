import { Component, OnInit, Output, EventEmitter } from '@angular/core';

@Component({
  selector: 'app-nav-bar',
  templateUrl: './nav-bar.component.html',
  styleUrls: ['./nav-bar.component.css']
})
export class NavBarComponent implements OnInit {

  constructor() { }

  // tslint:disable-next-line: no-output-on-prefix
  @Output() onToogle = new EventEmitter();
  ngOnInit() {
  }

  // tslint:disable-next-line: one-line
  disparaEvento(){
    this.onToogle.emit();
  }
}

