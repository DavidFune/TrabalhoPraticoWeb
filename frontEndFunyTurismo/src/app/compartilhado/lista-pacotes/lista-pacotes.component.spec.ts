import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ListaPacotesComponent } from './lista-pacotes.component';

describe('ListaPacotesComponent', () => {
  let component: ListaPacotesComponent;
  let fixture: ComponentFixture<ListaPacotesComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ListaPacotesComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ListaPacotesComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
