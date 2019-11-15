import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { FormComponent } from './form/form.component';
import { ProfileComponent } from './profile/profile.component';
import { ObservationsComponent } from './observations/observations.component';
import { CommentsComponent } from './comments/comments.component';
import { ResultComponent } from './result/result.component';
import { HeaderComponent } from './header/header.component';

@NgModule({
  declarations: [
    AppComponent,
    FormComponent,
    ProfileComponent,
    ObservationsComponent,
    CommentsComponent,
    ResultComponent,
    HeaderComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
