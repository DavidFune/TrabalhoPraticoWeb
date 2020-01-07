import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ErroMgsComponent } from './erro-mgs.component';

describe('ErroMgsComponent', () => {
  let component: ErroMgsComponent;
  let fixture: ComponentFixture<ErroMgsComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ErroMgsComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ErroMgsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
