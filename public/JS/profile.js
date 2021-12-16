$('#profile a').on('click', function(e) {
    e.preventDefault()
    console.log("Clicked")
    $(this).tab('show')
})