// Scripts para la gestión de carpetas
document.addEventListener('DOMContentLoaded', function() {
    const folders = document.querySelectorAll('.folder-management .folder');
    folders.forEach(folder => {
        folder.addEventListener('click', function() {
            const folderId = folder.getAttribute('data-folder-id');
            const folderContents = document.getElementById(folderId);
            if (folderContents.style.display === 'none' || folderContents.style.display === '') {
                folderContents.style.display = 'block';
                folder.classList.add('open');
            } else {
                folderContents.style.display = 'none';
                folder.classList.remove('open');
            }
        });
    });
});
