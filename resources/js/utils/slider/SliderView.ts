import { gsap, Expo } from 'gsap'
import { domUtils } from '../utils'
import { InfiniteSlider } from './InfiniteSlider'

export const constants = {
  COLLECTION_ELEMENT_WIDTH: 300,
  COLLECTION_ELEMENT_PADDING: 40,
  DEFAULT_ITEM_COUNT: 3,
}

class CollectionView extends InfiniteSlider {
  progress = 0
  tl = gsap.timeline()

  // DOM elements map
  public elements = new Map([
    ['showcase', domUtils.getDomElements('.showcase')],
    ['bottom-left', domUtils.getDomElements('.bottom-left')],
  ])

  public slide() {
    console.log(this.elements)
  }
}
