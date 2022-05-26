import { ComponentFixture, TestBed } from '@angular/core/testing';

import { AllOngoingTaskItemsComponent } from './all-ongoing-task-items.component';

describe('AllOngoingTaskItemsComponent', () => {
  let component: AllOngoingTaskItemsComponent;
  let fixture: ComponentFixture<AllOngoingTaskItemsComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ AllOngoingTaskItemsComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(AllOngoingTaskItemsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
