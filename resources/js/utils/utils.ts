export const domUtils = {
  toArray(element: any): HTMLElement[] {
    return [].slice.call(element)
  },
  getDomElements(selector: string): HTMLElement {
    return document.querySelector(selector)
  },
  create(element: string) {
    return document.createElement(element)
  },
}
