const postForm = document.forms['post-form']
const commentForms = document.forms['comment-form']
const inputPost = document.getElementById('post');
const inputPhoto = document.getElementById('photo')
const postButton = document.getElementById('post-btn');

// let commentNumber = 0;
// do {
    //     commentNumber++;
    // } while (commentNumber);
    
//     for( let commentButtons = 0; commentButtons<= 20; commentButtons++) {
//         const inputComments = document.getElementsByClassName('comment'+commentNumber);
//         const commentButtons = document.getElementsByClassName('comment-btn'+commentNumber);
//         commentForms.addEventListener("input", () => {
//             console.log(inputComments.value)
//             if (inputComments.value.trim()) {
//                 commentButtons.removeAttribute("disabled");
//             } else {
//                 commentButtons.setAttribute("disabled", "disabled");
//             }
//         });

// }

postForm.addEventListener("input", () => {
    if (inputPost.value.trim() || inputPhoto.value.trim()) {
        postButton.removeAttribute("disabled");
    } else {
        postButton.setAttribute("disabled", "disabled");
    }
});


// const timeAgo = (time) => {
//     time = new Date(time);
//     let currentTime = new Date();
//     let difference = Math.abs(currentTime.getTime() - time.getTime());
//     let secondDiff = Math.round(difference / 1000);
//     let dayDiff = Math.round(difference / (1000 * 3600 * 24));

//     if (dayDiff == 0) {
//         if (secondDiff < 6) return "just now"
//         if (secondDiff < 60) return secondDiff + " seconds ago"
//         if (secondDiff < 120) return "a minute ago"
//         if (secondDiff < 3600) return Math.round(secondDiff / 60) + " minutes ago"
//         if (secondDiff < 7200) return "an hour ago"
//         if (secondDiff < 86400) return Math.round(secondDiff / 3600) + " hours ago"
//     }
//     if (dayDiff == 1) return "Yesterday"
//     if (dayDiff < 7) return dayDiff + " days ago"
//     if (dayDiff < 14) return "a week ago"
//     if (dayDiff < 31) return (Math.round(dayDiff / 7) + " weeks ago")
//     if (dayDiff < 58) return "a month ago"
//     if (dayDiff < 365) return Math.round(dayDiff / 30) + " months ago"
//     if (dayDiff < 730) return "a year ago"

//     return Math.round(dayDiff / 365) + " years ago"
// }