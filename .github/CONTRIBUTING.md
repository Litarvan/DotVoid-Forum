# Contributing to DotVoid

Thanks a lot for contributing to the DotVoid community project!  

In this document, you will find guidelines explaining how to contribute to DotVoid.

## Table of contents

* [Code of conduct](#code-of-conduct)
* [Documentation](#documentation)
* [Issues](#issues)
  * [Before submitting an issue](#before-submitting-an-issue)
  * [Issue templates](#issue-templates)
    * [Report a bug](#report-a-bug)
    * [Support](#support)
    * [Suggest a new feature or enhancement](#suggest-a-new-feature-or-enhancement)
    * [Inform us](#inform-us)
* [Code contributions](#code-contributions)
  * [Coding style and conventions](#coding-style-and-conventions)
  * [Common practices](#common-practices)
  * [How to make a pull request](#how-to-make-a-pull-request)
* [Join the discussion on Discord](#join-the-discussion-on-discord)

## Code of conduct

We use the [Citizen Code of Conduct](http://citizencodeofconduct.org/) distributed under a [Creative Commons Attribution-ShareAlike license](https://creativecommons.org/licenses/by-sa/3.0/). It's also available [from the repository itself](CODE_OF_CONDUCT.md). Please read it, even if you don't plan on contributing.

## Documentation

You can find our technical documentation [here](). If anything feels wrong, outdated or badly documented, feel free to [tell us on Discord](#join-the-discussion-on-discord).

### Writing documentation

We are generating our documentation using [PHPDoc](https://www.phpdoc.org/).

Here is an example of a valid documentation block from the [Laravel contribution guide](https://laravel.com/docs/5.6/contributions).

```php
/**
 * Register a binding with the container.
 *
 * @param  string|array  $abstract
 * @param  \Closure|string|null  $concrete
 * @param  bool  $shared
 * @return void
 */
public function bind($abstract, $concrete = null, $shared = false)
{
    //
}
```

## Issues

This section will guide you through the process of reporting a bug, asking for support. Please understand that we need as much information as possible in your reports to be able to correctly address it. Be precise, describe the problem, the context, how it happened, and if possible why it happened.

### Before submitting an issue

Before submitting an issue, please make some research. Check that a similar issue has not been already submited. You may find what you need. Duplicate issues are undesirable.  

If you find an **open** issue similar to your problem, comment it instead of submitting a new one.  
If you find only a **closed** issue similar to your problem, submit a new one including a link to the original issue.

Note that support requests are preferably addressed on [our Discord](#join-the-discussion-on-discord). It's very likely that you'll get an answer faster there.

### Issue templates

Issues can be about multiple things: bug reports, support, feature requests or information. Each issue type has its own issue template. Pick the one corresponding to your case and fill it meticulously. You will find guides for each of them below.

* [Bug report](https://github.com/DotVoid-io/DotVoid-Forum/issues/new?template=bug_report.md)
* [Support](https://github.com/DotVoid-io/DotVoid-Forum/issues/new?template=support.md)
* [Feature request](https://github.com/DotVoid-io/DotVoid-Forum/issues/new?template=suggestion.md)
* [Information](https://github.com/DotVoid-io/DotVoid-Forum/issues/new?template=information.md)

Each issue type has specific instructions but all issues have shared requirements:

* **Use a clear and descriptive title.** Don't explain the problem in the title, it's only there to identify it.
* **Write your issues in english with a correct grammar and spelling.**
* **Don't hesitate to use [markdown](https://guides.github.com/features/mastering-markdown/)** to improve the presentation of your issue, highlight important things and improve readability. Any line of code should be inside a code format.

#### Report a bug

To report a bug, please use the [Bug report issue template](https://github.com/DotVoid-io/DotVoid-Forum/issues/new?template=bug_report.md).

You should submit a bug report **if and only if** a feature is not working as intended or some data has been altered in an undesirable way due to a malfunction. Bug reports can be about a use-case (a user does something and it doesn't work as intended) or about the use of specific code (a developer uses code from another developer and it's not working properly). 

Here are the specific requirements for bug reports:

* **Describe step-by-step** how the bug occurred. Be as precise as possible: even you feel that some details are stupid and not needed, please include them in your message. Describe what you did and how you did it.  
For example: `Click the "Create" button on the top right of the screen -> Fill the "name" field with "value" -> Fill the "description" field with "value description" -> ...`
* **Explain if the bug occurs always or only within a specific context.** For example, if the bug occurs when entering a set of values in a form, or with any.
* If a file is involved, **provide a screenshot of your directory's permissions**.
* **Explain what was the expected result** of your action and how it differs to the actual result.
* If possible, **include screenshots and/or the relevant code**.
* **Include the request status** provided by your browser in the "Network" tab in the developer tools. They give a lot of information such as the request's parameters, the response, status code, etc (It will be relevant most of the time)
* **Check your logs**. The PHP ones (`/var/log/apache2/error.log`) and the Laravel ones in the `storage/logs` folder. If they contain anything related to your issue, please include them in your report.
* **Check if you can reproduce the bug**. If yes, provide a detailled guideline to reproduce, just like your step-by-step description.
* **Include the branch and the commit hash** to let us know where you are located on the source control. Take this opportunity to check if you're up to date on this branch.
* **Are you running on a container or virtual machine?** If yes, is it the one provided in the repository or a custom one? Provide as many details as possible, including packets versions, OS and all what comes to your mind.


#### Ask for support

To ask for support, please use the [Support issue template](https://github.com/DotVoid-io/DotVoid-Forum/issues/new?template=support.md).

You should submit a "Support" issue if you're a contributor and you have troube installing a working environment or using a DotVoid-specific feature.
Note that support requests are preferably addressed on [our Discord](#join-the-discussion-on-discord). It's very likely that you'll get an answer faster there.

Here are the specific requirements for support issues:

* **Describe precisely what you are trying to achieve.** We need to understand exactly what you want to do to be able to understand the problem.
* **Describe the goal of the thing you're trying to achieve.** Explain the context: when your code would be called, what should be its result, ...
* **Provide us with the relevant code.** Show us the code you struggle to make working.
* If you are **using DotVoid-specific code or features, tell us which ones.**
* **Include the branch and the commit hash** to let us know where you are located on the source control. Take this opportunity to check if you're up to date on this branch.

Issues asking for someone to do a bit of code for you will be closed immediately.

#### Suggest a new feature or enhancement

To suggest a new feature or enhancement, please use the [Feature request issue template](https://github.com/DotVoid-io/DotVoid-Forum/issues/new?template=suggestion.md).

Feature or enhancements suggestions include completely new features, minor improvements, visual changes, ...

Here are the specific requirements for suggestions:

* **Explain the aim of your suggestion.** What should it be used for? What would it bring? Why would it be a good change?
* **Describe the current behavior and compare it to the one you expect to see.**
* **Include screenshots or code examples** of what your feature or change would look like. It would be even better to have comparisons bewteen the two.
* If your feature involves multiple steps for the user, **provide a detailled step-by-step description** of how your feature would be used or how it would process. 

#### Inform us

To inform us about something, please use the [Information issue template](https://github.com/DotVoid-io/DotVoid-Forum/issues/new?template=information.md).

Here are some possible cases that correspond to the "Information" issue type:

* You found a vulnerability in the code and want to warn us.
* You found some code that could be optimized and want to suggest an improvement.
* You found a typo or bad grammar/spelling.
* ...

Performance problems such as memory leaks or infinite loops should be reported as bugs because they can cause a failure. However, poorly optimized (but working and not subject to failure) functions that could be improved should be reported with the "Information" issue type.

This type of issue is much more flexible as it can be about a wide variety of cases. However, please keep being precise, detailled and constructive in your messages, providing as much information as you can.

#### When I shouldn't open an issue

* I'm having trouble using a user-end feature and ask for help.
* Reason 2

If any of these criterias meet your case, or if you're not sure if you should open an issue or not, head over [our Discord](#join-the-discussion-on-discord) and explain to us the problem precisely. We will dig it up and try to help you. If needed, we could ask you to open an issue.


## Code contributions

### Coding style and conventions

As our project is a community project open to many people, we've chosen to comply with the same coding style than Laravel itself so people can more easily get in and contribute.  

We're following the [PSR-2](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md) coding standard and the [PSR-4](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-4-autoloader.md) autoloading standard. Please read these guides before contributing with your code so you won't need any additional work reformatting.

### Common practices

#### Git

We are using **GitFlow**. You can learn more about it [here](https://datasift.github.io/gitflow/IntroducingGitFlow.html).  

##### Commits

A commit should contain only one fully completed change. Unrelated changes should be in separate commits.  
For example, if you change a behavior in a controller and a view needs to be updated to make this change relevant, you can put both changes in the same commit as they are related. Now let's say you changed the color of a button on the same view, it should be done in another commit as the change is unrelated.   

**Messages:**  

* Use the present tense with the imperative mood. (Example: "*Move logic from X to Y*")
* The first line must not exceed 72 characters. Add a blank line after it.
* If your commit is related to one or more issue(s), refer them on the third line (after the blank line).
* Add a clear description. Don't overdetail as the literal changes are also visible directly. The reader should understand what has changed and how it defers from the previous implementation.
* Depending on the type of change, prefix the title with the following:
  * `[B]`: bug fix
  * `[D]`: updated documentation or comments
  * `[F]`: new feature
  * `[M]`: new migration
  * `[R]`: refactor or code removal
  * `[T]`: new tests, factories and/or seeders
  * `[V]`: visual change

Don't hesitate to suggest other flags.

### How to make a pull request

Pull requests are the way for everyone to add their code into the project.  
All pull requests, if approved, are merged into **`develop`**.

To submit a pull request, please follow these instructions:

* Fill the [pull request template](PULL_REQUEST_TEMPLATE.md).
* **Describe the benefits of your changes.**
* **Describe the possible drawbacks and/or caveats of your changes.**
* If you want to include one or more issue numbers, **don't add them to the title**: use the appropriate section from the pull request template instead.
* If your pull request contains visual changes, **include screenshots**. Ideally, include a "before-after" screenshot too.
* If your pull request is functionnal (new helpers or utilities for example), **include some example usages**.
* **All code must be tested manually and automatically.** Run all tests on top of your new ones to check nothing has been broken. If a previous tests doesn't pass anymore, **don't modify the test** but fix the broken feature instead or contact us. In some cases, it may be a good idea to create a bug report.
* **New models and resources must have a [factory](https://laravel.com/docs/5.6/database-testing#writing-factories) and a [seeder](https://laravel.com/docs/5.6/seeding).** If your change involves a database change, your merge request **must include the relevant migrations**.
* **Your code must be documented and commented.** Run PHPDoc to generate an up to date documentation.   

Any pull request which doesn't comply with these rules will be ignored and closed.

## Join the discussion on Discord

Don't hesitate to come talk to the community to share your ideas or concerns on our [Discord](https://discord.gg/pmubSNC).  
We will be happy to answer your questions or help you setup your workspace to contribute to the project.  

The spoken language is mainly french but english is allowed aswell!