import gsap from 'gsap'

export const anime = (element): void => {
  gsap.to(element, {
    display: 'block',
  })
}
