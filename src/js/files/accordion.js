function EvilAccordion(element, options) {
  this.accordion = element;

  this.multiple = options?.multiple || false;
  this.itemSelector = options?.itemSelector || '.evil-accordion__item';
  this.titleSelector = options?.titleSelector || '.evil-accordion__title';
  this.bodySelector = options?.bodySelector || '.evil-accordion__body';
  this.accordionOpenClass = options?.accordionOpenClass || 'evil-accordion__item--open';

  this.accordionItems = this.accordion.querySelectorAll(this.itemSelector);

  this.init = function () {
    for (let accordionItem of this.accordionItems) {
      const accordionTitle = accordionItem.querySelector(this.titleSelector);
      const accordionBody = accordionItem.querySelector(this.bodySelector);

      accordionTitle.addEventListener('click', () => {
        if (accordionItem.classList.contains(this.accordionOpenClass)) {
          accordionBody.style.maxHeight = 0;
          accordionItem.classList.remove(this.accordionOpenClass);
        } else {
          if (!this.multiple) {
            for (let i = 0; i < this.accordionItems.length; i++) {
              this.accordionItems[i].querySelector(this.bodySelector).style.maxHeight = 0;
              this.accordionItems[i].classList.remove(this.accordionOpenClass);
            }
          }

          accordionBody.style.maxHeight = accordionBody.scrollHeight + 'px';
          accordionItem.classList.add(this.accordionOpenClass);
        }
      })
    }
  }

  this.init();
}

export default EvilAccordion;
