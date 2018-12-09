'use strict';

class Question {
  index () {
    var _$ = window.$;
    _$(document).on('click', '.btn-question-destroy', function (e) {
      e.preventDefault();
      var question = _$(this).attr('data');
      _$(`form.destroy-${question}`).submit();
    });
  }
}

export default window.question = new Question();
