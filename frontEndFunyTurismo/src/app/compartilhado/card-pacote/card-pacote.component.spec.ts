import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { CardPacoteComponent } from './card-pacote.component';

describe('CardPacoteComponent', () => {
  let component: CardPacoteComponent;
  let fixture: ComponentFixture<CardPacoteComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ CardPacoteComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(CardPacoteComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
