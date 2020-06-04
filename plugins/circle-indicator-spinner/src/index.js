import $ from 'jquery';
import './style.scss';

class jQuerySpinner {
  constructor(options) {
    const opt = Object.assign({
      duration: 300,
      created: true
		}, options);
		this.parentId_ = opt.parentId;
		this.appendId_ = '_spinner_wrap';
		this.overlayId_ = `${this.parentId_}${this.appendId_}`;
    this.duration_ = opt.duration;
    if (opt.created) {
      this.createElement();
    }
  }

  createElement() {
		try {
			const $el = $(`#${this.parentId_}`);
			const str = `<div id="${this.overlayId_}" class="jquery-spinner-wrap"><div class="jquery-spinner-circle"><span class="jquery-spinner-bar"></span></div></div>`;
			const html = $.parseHTML(str);
			$el.append(html);
		} catch (err) {
			console.error(err);
		}
  }

  removeElement() {
    try {
      const $el = $(`#${this.overlayId_}`);
      $el.remove();
    } catch (err) {
      console.error(err);
    }
  }
  
	show() {
		$(`#${this.overlayId_}`).fadeIn(this.duration_);
  }
  
	hide() {
		$(`#${this.overlayId_}`).fadeOut(this.duration_);
	}
}

// const jQuerySpinner = {
//   create(options) {
//     return new Spinner(options);
//   }
// }

export { jQuerySpinner };
