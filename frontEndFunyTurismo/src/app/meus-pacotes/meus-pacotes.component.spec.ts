import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { MeusPacotesComponent } from './meus-pacotes.component';

describe('MeusPacotesComponent', () => {
  let component: MeusPacotesComponent;
  let fixture: ComponentFixture<MeusPacotesComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ MeusPacotesComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(MeusPacotesComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
