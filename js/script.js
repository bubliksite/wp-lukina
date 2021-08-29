playVideo = (index) => {
    const video = document.getElementById(`video_${index}`)
    const playButton = document.getElementById(`play_${index}`)
    const pauseButton = document.getElementById(`pause_${index}`)
    collapseCaption(index)
    video.play()
    playButton.classList.remove('active')
    playButton.classList.add('disabled')
    pauseButton.classList.add('active')
    pauseButton.classList.remove('disabled')
}
pauseVideo = (index) => {
    const video = document.getElementById(`video_${index}`)
    const pauseButton = document.getElementById(`pause_${index}`)
    const playButton = document.getElementById(`play_${index}`)
    video.pause()
    expandCaption(index)
    pauseButton.classList.remove('active')
    pauseButton.classList.add('disabled')
    playButton.classList.add('active')
    playButton.classList.remove('disabled')
}

closeCaption = (index) => {
    document.getElementById(`caption_${index}`).style.display = 'none'
}
collapseCaption = (index) => {
    document.getElementById(`caption_text_${index}`).style.display = 'none'
    document.getElementById(`caption_${index}`).classList.add('collapsed')
    document.getElementById(`collapse_${index}`) ? document.getElementById(`collapse_${index}`).style.display = 'none' : null
    document.getElementById(`expand_${index}`) ? document.getElementById(`expand_${index}`).style.display = 'block' : null
}
expandCaption = (index) => {
    document.getElementById(`caption_text_${index}`).style.display = 'block'
    document.getElementById(`caption_${index}`).classList.remove('collapsed')
    document.getElementById(`collapse_${index}`) ? document.getElementById(`collapse_${index}`).style.display = 'block' : null
    document.getElementById(`expand_${index}`) ? document.getElementById(`expand_${index}`).style.display = 'none' : null
}