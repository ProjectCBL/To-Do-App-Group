import { ComponentFixture, TestBed } from '@angular/core/testing';

import { AllDoneTaskItemsComponent } from './all-done-task-items.component';

describe('AllDoneTaskItemsComponent', () => {
  let component: AllDoneTaskItemsComponent;
  let fixture: ComponentFixture<AllDoneTaskItemsComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ AllDoneTaskItemsComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(AllDoneTaskItemsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
