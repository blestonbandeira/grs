@extends('layouts.app')

@section('content')
<div class="container" >
    <div class="row justify-content-center">
        <div class="col-md-12">
        <h2>Formulario</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <div class="card" style="padding: 30px;">
                <div class="card-body">
                    
                    <form action="/form" method="post">
                    @csrf
                    <div class="form-group">
                            <label for="firstCourseOption">firstCourseOption</label>
                            <input type="text" class="form-control" id="firstCourseOption" name="firstCourseOption">
                        </div>
                        <div class="form-group">
                            <label for="motivation">Motivation</label>
                            <input type="text" class="form-control" id="motivation" name="motivation">
                        </div>
                        <div class="form-group">
                            <label for="preferencesA">preferencesA</label>
                            <input type="text" class="form-control" id="preferencesA" name="preferencesA">
                        </div>
                        <div class="form-group">
                            <label for="preferencesT">preferencesT</label>
                            <input type="text" class="form-control" id="preferencesT" name="preferencesT">
                        </div>
                        <div class="form-group">
                            <label for="objectives">objectives</label>
                            <input type="text" class="form-control" id="objectives" name="objectives">
                        </div>
                        <div class="form-group">
                            <label for="description">description</label>
                            <input type="text" class="form-control" id="description" name="description">
                        </div>
                        <div class="form-group">
                            <label for="rules">rules</label>
                            <input type="text" class="form-control" id="rules" name="rules">
                        </div>
                        <div class="form-group">
                            <label for="family">family</label>
                            <input type="text" class="form-control" id="family" name="family">
                        </div>
                        <div class="form-group">
                            <label for="familyUnemployment">familyUnemployment</label>
                            <input type="text" class="form-control" id="familyUnemployment" name="familyUnemployment">
                        </div>
                        <div class="form-group">
                            <label for="hobbies">hobbies</label>
                            <input type="text" class="form-control" id="hobbies" name="hobbies">
                        </div>
                        <div class="form-group">
                            <label for="reasons">reasons</label>
                            <input type="text" class="form-control" id="reasons" name="reasons">
                        </div>
                        <div class="form-group">
                            <label for="presentation">presentation</label>
                            <input type="text" class="form-control" id="presentation" name="presentation">
                        </div>
                        <div class="form-group">
                            <label for="posture">posture</label>
                            <input type="text" class="form-control" id="posture" name="posture">
                        </div>
                        <div class="form-group">
                            <label for="breakes">breakes</label>
                            <input type="text" class="form-control" id="breakes" name="breakes">
                        </div>
                        <div class="form-group">
                            <label for="speech">speech</label>
                            <input type="text" class="form-control" id="speech" name="speech">
                        </div>
                        <div class="form-group">
                            <label for="understanding">understanding</label>
                            <input type="text" class="form-control" id="understanding" name="understanding">
                        </div>
                        <div class="form-group">
                            <label for="comments">comments</label>
                            <input type="text" class="form-control" id="comments" name="comments">
                        </div>
                        <div class="form-group">
                            <label for="result">result</label>
                            <input type="text" class="form-control" id="result" name="result">
                        </div>
                        <div class="form-group">
                            <label for="finalSay">finalSay</label>
                            <input type="text" class="form-control" id="finalSay" name="finalSay">
                        </div>

                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>          
                </div>                           
            </div>
        </div>
    </div>
</div>
@endsection
