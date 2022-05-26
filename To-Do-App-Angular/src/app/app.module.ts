import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { RouterModule, Routes } from '@angular/router';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { HttpClientModule } from '@angular/common/http';
import { AppComponent } from './app.component';
import { AccessComponent } from './access/access.component';
import { LoginComponent } from './access/login/login.component';
import { RegisterComponent } from './access/register/register.component';
import { BoardComponent } from './board/board.component';
import { AllTaskItemsComponent } from './board/all-task-items/all-task-items.component';
import { AllDoneTaskItemsComponent } from './board/all-done-task-items/all-done-task-items.component';
import { AllOngoingTaskItemsComponent } from './board/all-ongoing-task-items/all-ongoing-task-items.component';

const routes: Routes = [
	{ path: '', component: AccessComponent },
	{ path: 'board', component: BoardComponent }
]

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
		HttpClientModule,
		FormsModule,
		[RouterModule.forRoot(routes)]
	],
	providers: [],
	bootstrap: [AppComponent]
})
export class AppModule { }
