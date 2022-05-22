function EvilAccordion(element, options) {
  this.accordion = element;

  this.opened = options?.opened || [];
  this.multiple = options?.multiple || false;
  this.itemSelector = options?.itemSelector || '.evil-accordion__item';
  this.titleSelector = options?.titleSelector || '.evil-accordion__title';
  this.bodySelector = options?.bodySelector || '.evil-accordion__body';
  this.accordionOpenClass = options?.accordionOpenClass || 'evil-accordion__item--open';

  this.accordionItems = this.accordion.querySelectorAll(this.itemSelector);

  this.init = function () {
    for (let i = 0; i < this.accordionItems.length; i++) {
      const accordionTitle = this.accordionItems[i].querySelector(this.titleSelector);

      accordionTitle.addEventListener('click', () => {
        if (this.accordionItems[i].classList.contains(this.accordionOpenClass)) {
          this.close(this.accordionItems[i]);
        } else {
          if (!this.multiple) {
            for (let j = 0; j < this.accordionItems.length; j++) {
              this.close(this.accordionItems[j]);
            }
          }

          this.open(this.accordionItems[i]);
        }
      })
    }

    for (let index of this.opened) {
      this.open(this.accordionItems[index]);
    }
  }

  this.open = function (accordionItem) {
    const accordionBody = accordionItem.querySelector(this.bodySelector);

    accordionBody.style.maxHeight = accordionBody.scrollHeight + 'px';
    accordionItem.classList.add(this.accordionOpenClass);
  }

  this.close = function (accordionItem) {
    const accordionBody = accordionItem.querySelector(this.bodySelector);

    accordionBody.style.maxHeight = 0;
    accordionItem.classList.remove(this.accordionOpenClass);
  }

  this.init();
}

export default EvilAccordion;
