import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { AccessComponent } from './access/access.component';
import { LoginComponent } from './access/login/login.component';
import { RegisterComponent } from './access/register/register.component';
import { BoardComponent } from './board/board.component';
import { AllTaskItemsComponent } from './board/all-task-items/all-task-items.component';
import { AllDoneTaskItemsComponent } from './board/all-done-task-items/all-done-task-items.component';
import { AllOngoingTaskItemsComponent } from './board/all-ongoing-task-items/all-ongoing-task-items.component';

@NgModule({
  declarations: [
    AppComponent,
    AccessComponent,
    LoginComponent,
    RegisterComponent,
    BoardComponent,
    AllTaskItemsComponent,
    AllDoneTaskItemsComponent,
    AllOngoingTaskItemsComponent,
  ],
  imports: [
    BrowserModule,
    AppRoutingModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
