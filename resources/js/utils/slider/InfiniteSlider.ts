import { gsap, Expo } from 'gsap'
import { Subject } from 'rxjs'

export interface SlideParams {
  slides: any[]
  verticalTranslatePosition?: number
  elemPadding?: number
  elemMargin?: number
  duration?: number
  ease?: any
}

export interface TranslateParams {
  element: any
  x: number
  y: number
  ease?: any
  duration?: number
  collection?: any[]
  propWidth?: number
  index?: number
}

export class InfiniteSlider {
  public slideLength: number

  /**
   * Active slide index
   */
  public activeSlide = 0

  /**
   * Additional progress index that switches faster than activeIndex
   */
  public progressIndex = 0

  public indexChange = new Subject<number>()
  public progressIndexChange = new Subject<number>()

  constructor() {}

  /**
   *
   * @param collection Collection array to manipulate.
   * @param elemPadding
   * @param elemMargin
   * @param verticalTranslatePosition
   * @param ease - (Optional param) Easing property. By default it uses Expo.easeInOut
   * @param duration - (Optional param) Slide duration. By default it uses 1 second.
   */
  public function({
    slides: [],
    ease = Expo.easeInOut as any,
    duration = 1,
  }: SlideParams) {}
}
