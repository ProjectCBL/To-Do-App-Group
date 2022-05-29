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
import { TaskCardComponent } from './task-card/task-card.component';
import { RetrieveComponent } from './board/retrieve/retrieve.component';
import { ModalEditorComponent } from './board/modal-editor/modal-editor.component';
import { AddButtonComponent } from './board/add-button/add-button.component';
import { LogoutButtonComponent } from './board/logout-button/logout-button.component';

const routes: Routes = [
	{ path: '', component: AccessComponent },
	{ path: 'access', component: AccessComponent },
	{ path: 'board', component: BoardComponent }
]

@NgModule({
	declarations: [
		AppComponent,
		AccessComponent,
		LoginComponent,
		RegisterComponent,
		BoardComponent,
		TaskCardComponent,
		RetrieveComponent,
		ModalEditorComponent,
  AddButtonComponent,
  LogoutButtonComponent,
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
