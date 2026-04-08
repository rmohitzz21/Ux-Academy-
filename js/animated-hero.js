// Animated Hero - Word Rotation Animation
;(() => {
    const titles = ["connect", "learn", "grow", "collaborate", "creative"]
    let currentIndex = 0
    const container = document.getElementById("animatedTitle")
  
    if (!container) return
  
    // Create word elements
    function createWordElements() {
      container.innerHTML = ""
      titles.forEach((title, index) => {
        const span = document.createElement("span")
        span.textContent = title
        span.className = "title-word"
        span.dataset.index = index
  
        if (index === 0) {
          span.classList.add("active")
        } else {
          span.classList.add("enter-down")
        }
  
        container.appendChild(span)
      })
    }
  
    // Animate to next word
    function animateToNext() {
      const words = container.querySelectorAll(".title-word")
      const prevIndex = currentIndex
      currentIndex = (currentIndex + 1) % titles.length
  
      words.forEach((word, index) => {
        word.classList.remove("active", "exit-up", "enter-down")
  
        if (index === currentIndex) {
          // New active word - animate in from bottom
          word.classList.add("active")
        } else if (index === prevIndex) {
          // Previous word - animate out to top
          word.classList.add("exit-up")
        } else {
          // All other words - position below
          word.classList.add("enter-down")
        }
      })
    }
  
    // Initialize
    createWordElements()
  
    // Start animation loop
    setInterval(animateToNext, 2000)
  })()
  