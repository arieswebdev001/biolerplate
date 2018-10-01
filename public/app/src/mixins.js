export const mixins = {
  methods: {
    moment: moment,
    spinButton(target) {
      target.classList.add("m-loader");
      target.classList.add("m-loader--right");
      target.setAttribute("disabled", true);
    },
    stopButton(target) {
      target.classList.remove("m-loader");
      target.classList.remove("m-loader--right");
      target.removeAttribute("disabled");
    },
    redirectToHome() {
      window.location.href = "../../#/dashboard";
    },
    redirectToLogin() {
      window.location.href = "../../#/login";
    },
    sweetAlert(text, confirm_callback) {
      swal(
        {
          title: "Confirmation",
          text: text,
          showCancelButton: !0,
          closeOnCancel: !0,
          cancelButtonClass: "btn-sm red",
          confirmButtonClass: "btn-sm blue",
          confirmButtonText: "YES",
          cancelButtonText: "NO"
        },
        function(t) {
          if (t) {
            confirm_callback();
          }
        }
      );
    },
    gate(user, permission, action) {
      if (user.level === 1) return true;
      if (user.level === 0) return false;

      if (user.level_data === undefined) return false;

      if (user.level_data[permission] === undefined) return false;

      return user.level_data[permission].indexOf(action) !== -1;
    }
  }
};
