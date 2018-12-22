'use strict';

class User {
  index () {
    var _$ = window.$;
    _$(document).on('click', '.btn-user-destroy', function (e) {
      e.preventDefault();
      var user = _$(this).attr('data');
      _$(`form.destroy-${user}`).submit();
    });
  }
}

export default window.user = new User();
