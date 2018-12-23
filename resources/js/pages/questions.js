'use strict';

class Question {
  index() {
    var _$ = window.$;
    _$('[data-toggle="tooltip"]').tooltip();

    _$(document).on('click', '.btn-question-destroy', function (e) {
      e.preventDefault();
      var question = _$(this).attr('data');
      _$(`form.destroy-${question}`).submit();
    });
  }

  group() {
    var _$ = window.$;
    _$('a.btn-add-sub-question').click(function (e) {
      e.preventDefault();
      _$('.sub-questions').append(_$(template())).show(400);
    });

    _$(document).on('click', '.btn-rm-sub', function (e) {
      e.preventDefault();
      var r = confirm('You really want to remove this data?');
      if (r == true) {
        $(this).parent().remove();
      }
    });

    function guid() {
      return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
        var r = Math.random() * 16 | 0, v = c == 'x' ? r : (r & 0x3 | 0x8);
        return v.toString(16);
      });
    }

    function template() {
      var uuid = guid();
      return `
      <div class="col-sm-12 card card-frame mb-4 pt-3">
          <a href="#" class="btn btn-outline-danger pull-right btn-sm btn-rm-sub">Remove</a>
          <div class="row sub-question card-body">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label for="title">Question:</label>
                      <input class="form-control form-control-alternative" 
                      placeholder="Write a text here ..." name="answers[${uuid}][content]" required>
                  </div>
                  <label for="title">Option:</label>
                  <div class="row">
                      <div class="col-sm-6">
                          <div class="input-group input-group-alternative ">
                              <div class="input-group-prepend">
                                  <div class="input-group-text">
                                      <input type="hidden" value="0" name="answers[${uuid}][answers][1][is_correct]">
                                      <input type="checkbox" value="1" aria-label="checkbox" 
                                      name="answers[${uuid}][answers][1][is_correct]">
                                  </div>
                              </div>
                              <input type="text" class="form-control" placeholder="Text input with radio button" 
                              name="answers[${uuid}][answers][1][content]" required>
                          </div>
                          <br>
                      </div>
                      <div class="col-sm-6">
                          <div class="input-group input-group-alternative ">
                              <div class="input-group-prepend">
                                  <div class="input-group-text">
                                      <input type="hidden" value="0" name="answers[${uuid}][answers][2][is_correct]">
                                      <input type="checkbox" value="1" aria-label="checkbox" 
                                      name="answers[${uuid}][answers][2][is_correct]">
                                  </div>
                              </div>
                              <input type="text" class="form-control" placeholder="Text input with radio button" 
                              name="answers[${uuid}][answers][2][content]" required>
                          </div>
                          <br>
                      </div>
                      <div class="col-sm-6">
                          <div class="input-group input-group-alternative ">
                              <div class="input-group-prepend">
                                  <div class="input-group-text">
                                      <input type="hidden" value="0" name="answers[${uuid}][answers][3][is_correct]">
                                      <input type="checkbox" value="1" aria-label="checkbox" 
                                      name="answers[${uuid}][answers][3][is_correct]">
                                  </div>
                              </div>
                              <input type="text" class="form-control" placeholder="Text input with radio button" 
                              name="answers[${uuid}][answers][3][content]" required>
                          </div>
                          <br>
                      </div>
                      <div class="col-sm-6">
                          <div class="input-group input-group-alternative ">
                              <div class="input-group-prepend">
                                  <div class="input-group-text">
                                      <input type="hidden" value="0" name="answers[${uuid}][answers][4][is_correct]">
                                      <input type="checkbox" value="1" aria-label="checkbox" 
                                      name="answers[${uuid}][answers][4][is_correct]">
                                  </div>
                              </div>
                              <input type="text" class="form-control" placeholder="Text input with radio button" 
                              name="answers[${uuid}][answers][4][content]" required>
                          </div>
                          <br>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      `;
    }
  }
}

export default window.question = new Question();
