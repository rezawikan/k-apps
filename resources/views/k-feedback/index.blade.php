@extends('layouts.app')

@section('title', 'K-Feedback')

@section('content')
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-md-12">
      <div class="ibox-content">
        <h2><i class="fa fa-comments"></i> Kopernik Management Feedback</h2>
        <div class="row">
          <div class="col-md-12">
            <div class="ibox-content">
              <blockquote>
                <p style="letter-spacing: 1px;text-align: justify;"><i class="fa fa-quote-left"></i> Criticism may not be agreeable, but it is necessary. It fulfils the same function as pain in the human body. It calls attention to an unhealthy state of things</p>
                <small><strong> Winston Churcil</strong></small>
              </blockquote>
              <p>In Kopernik, every feedback is highly appriciated. We believe every feedback are valuable to improve our organization. We are encouraging you to send us your feedback. Please use the form below if you have any and if you think you need privacy,
                you could be anonymous when send it.</p>
              <form method="post" action="">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Sender</label>
                  <select class="form-control" id="exampleFormControlSelect1">
                    <option value="anonymous">Anonymous</option>
                    <option value="reza@wikan.dito">reza@wikan.dito</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlInput1">Feedback</label>
                  <textarea class="form-control" id="feedback" name="feedback" rows="4"></textarea>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary mb-2">Send Feedback</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="ibox-content">
              <h2>Feedback (Only Visible for Leadership Group)</h2>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th width="10%">Sender</th>
                    <th width="77%">Feedback</th>
                    <th width="8%">Submitted</th>
                    <th width="5%">&nbsp;</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Anonymous</td>
                    <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type
                      specimen book.</td>
                    <td>03/27/2018</td>
                    <td><button type="button" class="btn btn-default btn-xs">Reply</button></td>
                  </tr>
                  <tr>
                    <td>Anonymous</td>
                    <td>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to
                      using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web
                      sites still in their infancy.</td>
                    <td>03/01/2018</td>
                    <td><button type="button" class="btn btn-default btn-xs">Reply</button></td>
                  </tr>
                  <tr>
                    <td>Romy Tubagus</td>
                    <td>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in
                      Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.</td>
                    <td>02/22/018</td>
                    <td><button type="button" class="btn btn-default btn-xs">Reply</button></td>
                  </tr>
                </tbody>
              </table>
              <nav aria-label="Page navigation example">
                <ul class="pagination">
                  <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
        <div class="hr-line-dashed"></div>
      </div>
    </div>
  </div>
</div>
@endsection
