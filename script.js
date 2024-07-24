document.addEventListener('DOMContentLoaded', function () {
    fetch('https://api.github.com/users/gusthls/repos')
        .then(response => response.json())
        .then(data => {
            const projectsDiv = document.getElementById('github-projects');
            data.forEach(repo => {
                const project = document.createElement('div');
                project.classList.add('project');

                reposvisual = ['GustHLS', 'portfolio']

                if (!reposvisual.includes(repo.name)){
                    project.innerHTML = `
                        <h3><a href="${repo.html_url}" target="_blank">${repo.name}</a></h3>
                        <p>${repo.description || 'No description provided'}</p>
                    `;
                    projectsDiv.appendChild(project);
                }
            });
        })
        .catch(error => console.error('Error fetching repos:', error));
});
