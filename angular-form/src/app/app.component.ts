import { Component, OnInit } from '@angular/core';
import { FormGroup, FormBuilder } from '@angular/forms';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent implements OnInit {
  angForm: FormGroup;
  constructor(private fb: FormBuilder) {
    this.createForm();
  }
  createForm() {
    this.angForm = this.fb.group({

      date: [''],
      applicantName: [''],
      interviewerName: [''],
      firstCourseOption: [''],
      motivation: [''],
      preferencesA: [''],
      preferencesT: [''],
      objectives: [''],
      description: [''],
      rules: [''],
      family: [''],
      familyUnemployment: [''],
      hobbies: [''],
      reasons: [''],
      presentation: [''],
      posture: [''],
      breakes: [''],
      speech: [''],
      understanding: [''],
      comments: [''],
      result: [''],
      finalSay: ['']
      

    });
  }
  onClickSubmit(email, password) {
    alert('Your Email is : ' + email);
  }
   ngOnInit() {
   }
}
